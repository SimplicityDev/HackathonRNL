import { Injectable } from '@angular/core';
import {
  CanActivate,
  ActivatedRouteSnapshot,
  RouterStateSnapshot,
    Router
} from '@angular/router';
import {AuthService} from 'ng2-ui-auth';

@Injectable()
export class AuthGuardService implements CanActivate {

  constructor(private auth: AuthService, private router: Router) { }

  canActivate(next: ActivatedRouteSnapshot, state: RouterStateSnapshot) {
    if(this.auth.isAuthenticated()) {
        return true;
    }
    this.router.navigateByUrl("/login")
      return false;
  }
}
