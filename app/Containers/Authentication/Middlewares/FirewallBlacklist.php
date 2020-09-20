<?php

namespace App\Containers\Authentication\Middlewares;

use PragmaRX\Firewall\Filters\Blacklist;
use PragmaRX\Firewall\Middleware\FirewallBlacklist as ParentBlacklist;
use Closure;
use Exception;
use App\Containers\Authentication\Exceptions\IpBlockedException;
class FirewallBlacklist extends ParentBlacklist
{
    protected $blacklist;

    public function __construct(Blacklist $blacklist)
    {
        $this->blacklist = $blacklist;
    }

    /**
     * Filter Request.
     *
     * @return mixed
     */
    public function filter()
    {
        return $this->blacklist->filter();
    }


    public function handle($request, Closure $next)
    {
        if ($this->enabled()) {
            $filterResponse = $this->filter();

            if ($filterResponse != null) {
                \Log::info('$filterResponse',array($filterResponse));
                //return response(['message'=>'Заблокированный IP адресс','email'=>$request->email,'password'=>$request->password], Response::HTTP_CONFLICT);
                throw new IpBlockedException("Access denied IP blocked", []);
                //return $filterResponse;
            }
        }

        return $next($request);
    }
}
