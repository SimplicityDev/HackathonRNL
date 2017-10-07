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
            desc: "Het plaatsen van een dakkapel op een woning in een woonwijk.",
            image: "dakkapel.jpg"
        },
        {
            title: "Slopen",
            step: 3,
            person: {
                street: "plein",
                postalCode: "1234AB",
                city: "Eindhoven"
            },
            totalSteps: 4,
            desc: "Een (gedeelte) van je woning/aanbouw slopen voor een andere uitebereiding/wijziging van je gebouw.",
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
            desc: "Een aanlegstijger aan je erf grens laten neerleggen zodat er boten kunnen aanmeren bij je gebouw.",
            image: "steiger.jpg"
        }
    ];
  constructor(ApiService: ApiService) {
    ApiService.requests(localStorage.getItem("user_id"));
  }


  ngOnInit() {
  }

}
