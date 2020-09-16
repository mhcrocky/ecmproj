<?

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Auth\RegistersUsers;

class RegisterController extends Controller{

	use RegistersUsers;

	protected $redirectTo = '/';

	public function __construct(){
		$this->middleware('guest');
	}

	public function validator(Array $data){
		return Validator::make($data, [
			'first_name'	=> ['required', 'string', 'max:255'],
			'last_name'		=> ['required', 'string', 'max:255'],
			'email'			=> ['required', 'string', 'email', 'max:255', 'unique:users'],
			'password'		=> ['required', 'string', 'min:8', 'confirmed'],
		]);
	}

}