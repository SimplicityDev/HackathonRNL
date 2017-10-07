import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-government-dashboard',
  templateUrl: './government-dashboard.component.html',
  styleUrls: ['./government-dashboard.component.css']
})
export class GovernmentDashboardComponent implements OnInit {
  public showDetailsBlock;
  constructor() { }
  public showDetails() {
    this.showDetailsBlock = true;
  }
  ngOnInit() {
  }

}
