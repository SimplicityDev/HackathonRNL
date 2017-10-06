import { Component, OnInit } from '@angular/core';
import {ApiService} from "../api.service";

@Component({
  selector: 'app-dashboard',
  templateUrl: './dashboard.component.html',
  styleUrls: ['./dashboard.component.css']
})

export class DashboardComponent implements OnInit {

    public requests = [
        {
            title: "Dakkapel",
            step: 3,
            totalSteps: 12,
            person: {
                street: "plein",
                postalCode: "1234AB",
                city: "Eindhoven"
            },
            desc: "lorem ipsum dolor sit amet si;dughunaek;j gakldng asld knfbslkd jfng sldkjfn skdjf ksdfj nskdlf nsdkfj nsndmf nsd ,sdf ",
            image: "http://placehold.it/300x200"
        },{
            title: "Steiger",
            step: 2,
            totalSteps: 8,
            person: {
                street: "plein",
                postalCode: "1234AB",
                city: "Eindhoven"
            },
            desc: "qwertyuiopasdfghjkl;zxcvbnm wertyuisdfghjvbn edfgbnjyhgvbnlouytgfc vbnhmnytghv",
            image: "http://placehold.it/300x200"
        }, {
            title: "Huis slopen",
            step: 3,
            person: {
                street: "plein",
                postalCode: "1234AB",
                city: "Eindhoven"
            },
            totalSteps: 4,
            desc: "Sloop die shit",
            image: "http://placehold.it/300x200"
        },{
            title: "Steiger",
            step: 2,
            totalSteps: 8,
            person: {
                street: "plein",
                postalCode: "1234AB",
                city: "Eindhoven"
            },
            desc: "qwertyuiopasdfghjkl;zxcvbnm wertyuisdfghjvbn edfgbnjyhgvbnlouytgfc vbnhmnytghv",
            image: "http://placehold.it/300x200"
        }
    ];
  constructor(ApiService: ApiService) {
    ApiService.requests(localStorage.getItem("user_id"));
  }


  ngOnInit() {
  }

}
