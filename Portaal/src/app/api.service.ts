import { Injectable } from '@angular/core';
import {JwtHttp} from 'ng2-ui-auth';
import {Response} from '@angular/http';
@Injectable()
export class ApiService {
  private base_url: String = "http://localhost/api";
  constructor(private http: JwtHttp) {

  }
  public me() {
    return this.http.get(this.base_url + 'user/me').map((res: Response) => res.json());
  }
}
