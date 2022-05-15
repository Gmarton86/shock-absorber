<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OctaveController extends Controller {

    public function calculate(Request $request) {
        $result = null;
        if(isset($request->r)) {
            $cmd = "pkg load control;m1 = 2500; m2 = 320;k1 = 80000; k2 = 500000;b1 = 350; b2 = 15020;A=[0 1 0 0;-(b1*b2)/(m1*m2) 0 ((b1/m1)*((b1/m1)+(b1/m2)+(b2/m2)))-(k1/m1) -(b1/m1);b2/m2 0 -((b1/m1)+(b1/m2)+(b2/m2)) 1;k2/m2 0 -((k1/m1)+(k1/m2)+(k2/m2)) 0];B=[0 0;1/m1 (b1*b2)/(m1*m2);0 -(b2/m2);(1/m1)+(1/m2) -(k2/m2)];C=[0 0 1 0]; D=[0 0];Ba = [B;[0 0]];Ca = [C,0]; Da = D;K = [0 2.3e6 5e8 0 8e6];Aa = [[A,[0 0 0 0]'];[C, 0]];
            sys = ss(Aa-Ba(:,1)*K,Ba,Ca,Da);
            t = 0:0.01:5;r =" . $request->r . ";initX1=0; initX1d=0;initX2=0; initX2d=0;[y,t,x]=lsim(sys*[0;1],r*ones(size(t)),t,[initX1;initX1d;initX2;initX2d;0]);
            y";

            exec("octave-cli --eval \"" . $cmd . "\"", $result);

            $values = array_splice($result, 0, 2);

            if(isset($request->i)) {
                  return view("welcome", [
                    "data" => $result[$request->i]
                ]);
            }
        }
    }

    public function command(Request $request) {
        $result = null;
        if(isset($request->cmd)) {
            $cmd = "pkg load control;" . $request->cmd;

            exec("octave-cli --eval \"" . $cmd . "\"", $result);

            return view("welcome", [
                "data" => $result
            ]);
        }
    }
}

?>