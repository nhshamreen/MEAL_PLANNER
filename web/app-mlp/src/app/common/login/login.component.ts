import { Component, OnInit } from '@angular/core';
import {HttpClient} from '@angular/common/http';
import { Router } from '../../../../node_modules/@angular/router';
@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.scss']
})
export class LoginComponent implements OnInit {

  constructor(private http:HttpClient,private route:Router) { }
  public email: string;
  public password :string;
  ngOnInit() {
  }

 public  doLogin()
  {
    let param= {
          email: this.email,
          password: this.password
    }
     return this.http.get('../api/login.php',{params:param}).subscribe(
       (data:any)=>{
         console.log(data)
        if(data.OUT_RTN_CD==0) 
        {
          this.route.navigate(["welcome"])
        }
        else
          window.alert("Invalid Credentials!Please try again")

        }
     );
  }

}
