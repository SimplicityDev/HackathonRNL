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
        },{
            title: "Zonnepanelen plaatsen",
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
            title: "Asbest verwijderen",
            step: 3,
            person: {
                street: "plein",
                postalCode: "1234AB",
                city: "Eindhoven"
            },
            totalSteps: 4,
            desc: "Het verwijderen van asbest op je dak van je gebouw. ",
            image: "asbest.jpg"
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
