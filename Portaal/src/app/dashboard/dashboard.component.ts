import {Component, EventEmitter, OnInit} from '@angular/core';
import {ApiService} from "../api.service";
import {MatDialog, MatDialogRef} from "@angular/material";
import {StepDialogComponent} from "../step-dialog/step-dialog.component";

@Component({
  selector: 'app-dashboard',
  templateUrl: './dashboard.component.html',
  styleUrls: ['./dashboard.component.css']
})

export class DashboardComponent implements OnInit {

    public requests = [
        {
            status: 'error',
            title: "Dakkapel",
            step: 7,
            totalSteps: 12,
            person: {
                street: "plein",
                postalCode: "1234AB",
                city: "Eindhoven"
            },
            steps: [
                {
                    title: "Aanmelden van plaatsing",
                    status: 'completed',
                    desc: "U dient de plaatsing van deze dakkapel aan te melden",
                    done: true
                },
                {
                    title: "Aanmelden van plaatsing 2",
                    status: 'completed',
                    desc: "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\n" +
                    "tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\n" +
                    "quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\n" +
                    "consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\n" +
                    "cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\n" +
                    "proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
                    done: true
                },
                {
                    title: "Aanmelden van plaatsing 3",
                    status: 'completed',
                    desc: "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\n" +
                    "tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\n" +
                    "quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\n" +
                    "consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\n" +
                    "cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\n" +
                    "proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
                    done: true
                },
                {
                    title: "Aanmelden van plaatsing 3",
                    status: 'completed',
                    desc: "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\n" +
                    "tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\n" +
                    "quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\n" +
                    "consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\n" +
                    "cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\n" +
                    "proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
                    done: true
                },
                {
                    title: "Aanmelden van plaatsing 3",
                    status: 'completed',
                    desc: "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\n" +
                    "tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\n" +
                    "quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\n" +
                    "consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\n" +
                    "cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\n" +
                    "proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
                    done: true
                },
                {
                    title: "Aanmelden van plaatsing 3",
                    status: 'completed',
                    desc: "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\n" +
                    "tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\n" +
                    "quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\n" +
                    "consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\n" +
                    "cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\n" +
                    "proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
                    done: true
                },
                {
                    title: "Aanmelden van plaatsing 3",
                    status: 'completed',
                    desc: "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\n" +
                    "tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\n" +
                    "quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\n" +
                    "consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\n" +
                    "cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\n" +
                    "proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
                    done: true
                },
                {
                    title: "Aanmelden van plaatsing 3",
                    status: 'attention_required',
                    desc: "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\n" +
                    "tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\n" +
                    "quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\n" +
                    "consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\n" +
                    "cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\n" +
                    "proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
                    done: true
                },
                {
                    title: "Aanmelden van plaatsing 3",
                    status: 'pending',
                    desc: "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\n" +
                    "tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\n" +
                    "quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\n" +
                    "consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\n" +
                    "cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\n" +
                    "proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
                    done: false
                },
                {
                    title: "Aanmelden van plaatsing 3",
                    status: 'pending',
                    desc: "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\n" +
                    "tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\n" +
                    "quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\n" +
                    "consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\n" +
                    "cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\n" +
                    "proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
                    done: false
                },
                {
                    title: "Aanmelden van plaatsing 3",
                    status: 'pending',
                    desc: "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\n" +
                    "tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\n" +
                    "quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\n" +
                    "consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\n" +
                    "cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\n" +
                    "proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
                    done: false
                },
                {
                    title: "Aanmelden van plaatsing 3",
                    status: 'pending',
                    desc: "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\n" +
                    "tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\n" +
                    "quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\n" +
                    "consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\n" +
                    "cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\n" +
                    "proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
                    done: false
                },
                {
                    title: "Aanmelden van plaatsing 3",
                    status: 'pending',
                    desc: "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\n" +
                    "tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\n" +
                    "quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\n" +
                    "consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\n" +
                    "cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\n" +
                    "proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
                    done: false
                }
            ],
            desc: "lorem ipsum dolor sit amet si;dughunaek;j gakldng asld knfbslkd jfng sldkjfn skdjf ksdfj nskdlf nsdkfj nsndmf nsd ,sdf ",
            image: "http://placehold.it/300x200"
        },{
            status:'in_progress',
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
            status:'in_progress',
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
            status:'completed',
            title: "Steiger aanleggen",
            step: 5,
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
  constructor(ApiService: ApiService, private dialog: MatDialog) {
    ApiService.requests(localStorage.getItem("user_id"));
  }


  ngOnInit() {
  }

  public itemClicked(data){
        this.dialog.open(StepDialogComponent, {data: data});
  }

}
