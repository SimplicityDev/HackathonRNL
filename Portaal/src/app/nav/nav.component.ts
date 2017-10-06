import { Component, OnInit } from '@angular/core';
import {AuthService} from "ng2-ui-auth";
import {Router} from "@angular/router";

@Component({
  selector: 'app-nav',
  templateUrl: './nav.component.html',
  styleUrls: ['./nav.component.css']
})
export class NavComponent implements OnInit {

  public menu_items = [
      {
        name: "Home",
          link: "/",
          auth: true
      },
      {
          name: "woop",
          link: "/",
          auth: true
      },
      {
          name: "bfoiewj",
          link: "/",
          auth: true
      },
      {
          name: "Login",
          link: "/login",
          auth: false
      },
      {
          name: "Logout",
          click: "ACTION_LOGOUT",
          auth: true
      },
  ];

  constructor(public auth: AuthService, private router: Router) { }

  ngOnInit() {
  }

  action(action: String){
    switch(action){
        case "ACTION_LOGOUT":
            this.auth.logout().subscribe(() => {
                this.router.navigateByUrl("/login");
            })
          break;
    }
  }
}
