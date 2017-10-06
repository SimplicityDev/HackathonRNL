import { Component, OnInit } from '@angular/core';
import {AuthService} from "ng2-ui-auth";
import {Router} from "@angular/router";

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {

    public user = {};

  constructor(private auth: AuthService, private router: Router) { }

  ngOnInit() {

  }

  login(){
      this.auth.login(this.user).subscribe((response) => {
            this.router.navigateByUrl("/");
      }, error =>{
          console.log(error);
      });
  }
}
