import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-questions',
  templateUrl: './questions.component.html',
  styleUrls: ['./questions.component.css']
})
export class QuestionsComponent implements OnInit {
     public questions = [
        "Gaat het om werkzaamheden aan een monument?",
        "Krijgt uw dakkapel een plat dak?",
        "Is de hoogte boven de 1.75m"
    ];
  constructor() { }

  ngOnInit() {
  }

}
