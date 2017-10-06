import { Component, OnInit } from '@angular/core';
import {ApiService} from "../api.service";

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.css']
})
export class HomeComponent implements OnInit {

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
            image: "dakkapel.jpg"
        },{
            title: "Steiger",
            step: 2,
            totalSteps: 8,
            person: {
                street: "plein",
                postalCode: "1234AB",
                city: "Eindhoven"
            },
            desc: "qwertyuiopasdf hjkl;zxcvbnm wertyuisdfghjvbn edfgbnjyhgvbnlouytgfc vbnhmnytghv",
            image: "steiger.jpg"
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
            image: "slopen.jpg"
        },{
            title: "Steiger",
            step: 2,
            totalSteps: 8,
            person: {
                street: "plein",
                postalCode: "1234AB",
                city: "Eindhoven"
            },
            desc: "qwertyuiopasdfghj kl;zxcvbnm wertyuisdfghjvbn edfgbnjyhgvbnlouytgfc vbnhmnytghv",
            image: "steiger.jpg"
        }
    ];
  constructor(ApiService: ApiService) {
    ApiService.requests(localStorage.getItem("user_id"));
  }


  ngOnInit() {
  }

}
