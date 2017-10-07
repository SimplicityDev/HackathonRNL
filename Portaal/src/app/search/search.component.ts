import { Component, OnInit } from '@angular/core';
import {ApiService} from "../api.service";

@Component({
  selector: 'app-search',
  templateUrl: './search.component.html',
  styleUrls: ['./search.component.css']
})
export class SearchComponent implements OnInit {
    public filteredItems;
    public requests = [
        {
            title: "Terein - Schutting",
            step: 3,
            totalSteps: 12,
            person: {
                street: "plein",
                postalCode: "1234AB",
                city: "Eindhoven"
            },
            desc: "Het plaatsen van eens scheiding tussen 2 landgrenzen",
            image: "schutting.jpg"
        },{
            title: "Verbouwing - Dakkapel",
            step: 5,
            totalSteps: 6,
            person: {
                street: "plein",
                postalCode: "1234AB",
                city: "Eindhoven"
            },
            desc: "Het plaatsen van een dakkapel op een woning in een woonwijk.",
            image: "dakkapel.jpg"
        },{
            title: "Verbouwing - Zonnepanelen",
            step: 2,
            totalSteps: 8,
            person: {
                street: "plein",
                postalCode: "1234AB",
                city: "Eindhoven"
            },
            desc: "Zonnepanelen plaatsen op je dak waarmee je beter bent voor het mileu.",
            image: "zonnepaneel.jpg"
        }, {
            title: "Verbouwing - Asbest verwijderen",
            step: 3,
            person: {
                street: "plein",
                postalCode: "1234AB",
                city: "Eindhoven"
            },
            totalSteps: 4,
            desc: "Het verwijderen van asbest op je dak van je gebouw. ",
            image: "asbest.jpg"
        },        {
            title: "Verbouwen - Slopen",
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
            title: "Terein - Steiger",
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
    assignCopy(){
        this.filteredItems = Object.assign([], this.requests);
    }
    public filterItem(value) {
        if (!value) this.assignCopy(); //when nothing has typed
        this.filteredItems = Object.assign([], this.requests).filter(
            item => item.title.toLowerCase().indexOf(value.toLowerCase()) > -1
        )
    }
  ngOnInit() {
        this.filteredItems = this.requests;
  }

}
