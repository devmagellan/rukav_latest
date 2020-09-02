<?php

namespace App\Containers\StaticPage\UI\WEB\Controllers;

use App\Containers\StaticPage\UI\WEB\Requests\CreateStaticPageRequest;
use App\Containers\StaticPage\UI\WEB\Requests\DeleteStaticPageRequest;
use App\Containers\StaticPage\UI\WEB\Requests\GetAllStaticPagesRequest;
use App\Containers\StaticPage\UI\WEB\Requests\FindStaticPageByIdRequest;
use App\Containers\StaticPage\UI\WEB\Requests\UpdateStaticPageRequest;
use App\Containers\StaticPage\UI\WEB\Requests\StoreStaticPageRequest;
use App\Containers\StaticPage\UI\WEB\Requests\EditStaticPageRequest;
use App\Ship\Parents\Controllers\WebController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\StaticPage\UI\WEB\Controllers
 */
class Controller extends WebController
{
    /**
     * Show all entities
     *
     * @param GetAllStaticPagesRequest $request
     */
    public function index(GetAllStaticPagesRequest $request)
    {
        $data['menu'] = Apiato::call('AdminMenu@GetAllAdminMenusAction', [$request]);


        return view('staticpage::admin.index', $data);
    }

    public function postData(GetAllStaticPagesRequest $request)
    {
        $data['staticpages'] = Apiato::call('StaticPage@GetAllStaticPagesAction', [$request]);
        return view('staticpage::admin.table', $data);
        // ..
    }

    /**
     * Show one entity
     *
     * @param FindStaticPageByIdRequest $request
     */
    public function show(FindStaticPageByIdRequest $request)
    {
        $staticpage = Apiato::call('StaticPage@FindStaticPageByIdAction', [$request]);

        // ..
    }

    /**
     * Create entity (show UI)
     *
     * @param CreateStaticPageRequest $request
     */
    public function create(CreateStaticPageRequest $request)
    {
        // ..
    }

    /**
     * Add a new entity
     *
     * @param StoreStaticPageRequest $request
     */
    public function store(StoreStaticPageRequest $request)
    {
        $staticpage = Apiato::call('StaticPage@CreateStaticPageAction', [$request]);

        // ..
    }

    /**
     * Edit entity (show UI)
     *
     * @param EditStaticPageRequest $request
     */
    public function edit(EditStaticPageRequest $request)
    {
        $staticpage = Apiato::call('StaticPage@GetStaticPageByIdAction', [$request]);

        // ..
    }

    /**
     * Update a given entity
     *
     * @param UpdateStaticPageRequest $request
     */
    public function update(UpdateStaticPageRequest $request)
    {
        $staticpage = Apiato::call('StaticPage@UpdateStaticPageAction', [$request]);

        // ..
    }

    /**
     * Delete a given entity
     *
     * @param DeleteStaticPageRequest $request
     */
    public function delete(DeleteStaticPageRequest $request)
    {
         $result = Apiato::call('StaticPage@DeleteStaticPageAction', [$request]);

         // ..
    }
	
	public function getPage(GetAllStaticPagesRequest $request,$page){
	
        $data['firstHelpPage']=\App\Containers\StaticPage\Models\StaticPage::where('link',$page)->orderBy('position','asc')->with('getSidebar')->first();
        $data['properties']=$this->getMainProperties($request);
        switch($data['firstHelpPage']->type){
            case 3:
                $template='about_us';
                break;

            case 2:
                $template='adv';
                break;
            case 4:
                $template='career';
                break;
            case 'politics':
                $template='politics';
                break;
            case 6:
                $template='help';
                break;

            default:
                $template='static';
        }

        return view('staticpage::'.$template.'.index', compact('data'));
	}

    public function updateStaticPageStatus(GetAllStaticPagesRequest $request){

        $status=($request->input('status')=='true') ? 1 :0;

        $companySlider['values']=['active'=>$status ];
        $entityClass=\App\Containers\StaticPage\Models\StaticPage::class;
        $companySlider['attributes']['id']=(null!=($request->input('id')) && !empty($request->input('id'))) ? $request->input('id') : null;
        return call_user_func("{$entityClass}::query")->updateOrCreate($companySlider['attributes'], $companySlider['values']);
    }


    public function postSave(GetAllStaticPagesRequest $request){
        //var_dump($request->input());
        $position = \App\Containers\StaticPage\Models\StaticPage::orderBy('position','desc')->first();
        if($request->input('staticpage_id') && $request->input('staticpage_id')!=0){
            $position= \App\Containers\StaticPage\Models\StaticPage::where('id',$request->input('staticpage_id'))->first()->position;
        }
        else{
            $position=($position) ? $position->position+1 : 1;
        }

        $companySlider['values']=[
            'link'=>$request->input('staticpage_link'),
            'name'=>$request->input('staticpage_name'),
            'content'=>$request->input('staticpage_content'),
            'active'=>($request->input('active')=='true') ? 1 : 0,
            'editor'=>\Auth::user()->id,
        'position'=>$position];
        $entityClass=\App\Containers\StaticPage\Models\StaticPage::class;
        $companySlider['attributes']['id']=($request->input('staticpage_id')&& $request->input('staticpage_id')!=0) ? $request->input('staticpage_id') : null;
        return call_user_func("{$entityClass}::query")->updateOrCreate($companySlider['attributes'], $companySlider['values']);

    }


    public function getGroups(GetAllStaticPagesRequest $request){
      $data['groups']=  \App\Containers\StaticPage\Models\StaticPageGroup::where('staticpage_id',$request->input('staticpage_id'))->get();
        return view('staticpage::admin.groups', $data);
    }

    public function getSidebar(GetAllStaticPagesRequest $request){
        $data['groups']=  \App\Containers\StaticPage\Models\StaticPageSidebar::where('staticpage_id',$request->input('staticpage_id'))->get();
        return view('staticpage::admin.groups', $data);
    }

    public function updateGroup(GetAllStaticPagesRequest $request){
        $data['groups']=  \App\Containers\StaticPage\Models\StaticPage::where('id',$request->input('staticpage_id'))->update(['group'=>$request->input('group_id')]);
        return json_encode(['result'=>'success']);
    }

    public function updateType(GetAllStaticPagesRequest $request){
        $data['groups']=  \App\Containers\StaticPage\Models\StaticPage::where('id',$request->input('staticpage_id'))->update(['type'=>$request->input('type_id')]);
        return json_encode(['result'=>'success']);
    }
    public function postGroupsSave(GetAllStaticPagesRequest $request){
        //var_dump($request->input());
var_dump($request->input('form'));

        parse_str($request->input('form'), $searcharray);
        print_r($searcharray);

       \App\Containers\StaticPage\Models\StaticPageGroup::where('staticpage_id',$searcharray['staticpage_group_id'])->delete();
    foreach($searcharray['link'] as $key=>$link){
        $insert=[
            'staticpage_id'=>$searcharray['staticpage_group_id'],
            'link'=>$link,
            'name'=>$searcharray['name'][$key]
        ];
        \App\Containers\StaticPage\Models\StaticPageGroup::where('staticpage_id',$searcharray['staticpage_group_id'])->insert($insert);
    }
    }

    public function postSidebarSave(GetAllStaticPagesRequest $request){
        //var_dump($request->input());
        var_dump($request->input('form'));

        parse_str($request->input('form'), $searcharray);
        print_r($searcharray);

        \App\Containers\StaticPage\Models\StaticPageSidebar::where('staticpage_id',$searcharray['staticpage_group_id'])->delete();
        foreach($searcharray['link'] as $key=>$link){
            $insert=[
                'staticpage_id'=>$searcharray['staticpage_group_id'],
                'link'=>$link,
                'name'=>$searcharray['name'][$key]
            ];
            \App\Containers\StaticPage\Models\StaticPageSidebar::where('staticpage_id',$searcharray['staticpage_group_id'])->insert($insert);
        }
    }



    public function showHelp(FindStaticPageByIdRequest $request,$id){

        $helpPages=\App\Containers\StaticPage\Models\StaticPage::where('group',1)->get();
        $data['firstHelpPage']=$helpPages->slice($id-1, $id)->first();
        foreach($helpPages as $page){
            if($page->id!==$data['firstHelpPage']->id){
            $data['restHelpPage'][]=$page;
            }
        }
        $data['properties']=$this->getMainProperties($request);
        return view('staticpage::help.index', compact('data'));

    }

    public function postDelete(GetAllStaticPagesRequest $request){
        $message=\App\Containers\StaticPage\Models\StaticPage::where('id',$request->input('staticpage_id'))->delete();
        return \Response::json(['result'=>'success']);

    }


    public function setPosition(GetAllStaticPagesRequest $request)
    {
        $update=[];
        $data['staticpage'] = \App\Containers\StaticPage\Models\StaticPage::where('id',$request->input('id'))->first();

        if($request->input('state')==0){

            $update['position']=$data['staticpage']->position+1;
            $data['staticpage'] = \App\Containers\StaticPage\Models\StaticPage::where('position',$update['position'])->update(['position'=>$update['position']-1]);
        }
        else{
            $update['position']=$data['staticpage']->position-1;
            $data['staticpage'] = \App\Containers\StaticPage\Models\StaticPage::where('position',$update['position'])->update(['position'=>$update['position']+1]);
        }

        \App\Containers\StaticPage\Models\StaticPage::where('id',$request->input('id'))->update($update);

        return json_encode(['status'=>'success']);
    }

}
