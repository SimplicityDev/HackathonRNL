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
          show: 0
      },
      {
          name:"Search",
          link:"/search",
          show: 0
      },
      {
          name:"Dashboard",
          link:"/dashboard",
          show: 2
      },
      {
          name: "Contact",
          link: "/contact",
          show: 0
      },
      {
          name: "Logout",
          click: "ACTION_LOGOUT",
          show: 2
      },
  ];
  public menuItemShouldBeShown(item_show) {
    if(this.auth.isAuthenticated() && item_show === 2) {
        return true;
    } else if(!this.auth.isAuthenticated() && item_show === 1) {
        return true;
    }
  }
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
