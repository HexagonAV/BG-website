<?php
  
namespace App\Http\Controllers;

use Illuminate\Auth\GenericUser;
use App\User;
use Debugbar;
use Auth;
use Redirect;
use App\Http\Controllers\Controller;
use Invisnik\LaravelSteamAuth\SteamAuth;

class SteamController extends Controller {

    /**
     * @var SteamAuth
     */
    public $steam;

    public function __construct(SteamAuth $steam)
    {
        $this->steam = $steam;
    }

    public function getLogin()
    {
        if($this->steam->validate()) {
      Debugbar::warning('OK');
            $info = $this->steam->getUserInfo();
            if(!is_null($info)) {
              try {
                $user = User::where('steamid', $info->getSteamID())->first();
                if(is_null($user)) {
                  $user = User::create([
                    'name' => $info->getNick(),
                    'steamid' => $info->getSteamID(),
                    'profileURL' => $info->getProfileURL(),
                  ]);
                }
                if($user->name != $info->getNick() || $user->profileURL != $info->getProfileURL()) {
                  $user->name = $info->getNick();
                  $user->profileURL = $info->getProfileURL();
                  $user->save();
                }
                
                Auth::login($user);
                return Redirect::to('/success');
                
              } catch(Illuminate\Database\Eloquent\ModelNotFoundException $ex) {

              }
            }
        } else {
            return  $this->steam->redirect(); //redirect to steam login page
        }
    }
  
  public function getLogout()
  {
    Auth::logout();
    return Redirect::to('/');
  }
}