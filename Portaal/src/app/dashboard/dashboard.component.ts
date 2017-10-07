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
            step: 5,
            totalSteps: 6,
            person: {
                street: "Leliestraat 29",
                postalCode: "5482XK",
                city: "Eindhoven"
            },
            steps: [
                {
                    title: "De aanvraag is ingediend",
                    status: 'completed',
                    desc: "De aanvraag is succesvol ingediend",
                    done: true
                },
                {
                    title: "Informatie controleren",
                    status: 'completed',
                    desc: "De informatie wordt op dit moment gecontroleerd door de gemeente Meijerijstad en kijkt of je aanvraag in het straatbeeld past.",
                    done: true
                },
                {
                    title: "Controle van wetgeving",
                    status: 'completed',
                    desc: "De gemeente Meijerijstad kijkt of de wetgeving wordt nageleefd.",
                    done: true
                },
                {
                    title: "Bezwaar termijn",
                    status: 'completed',
                    desc: "Tijdens deze 6 weken tijd kan er door de belanghebbende bezwaar aangetekend worden.",
                    done: true
                },
                {
                    title: "Bezwaar controleren",
                    status: 'in_process',
                    desc: "De gemeente Meijerijstad kijkt of het bezwaar terecht is.",
                    done: false
                },
                {
                    title: "Eventuele informatie bijvullen",
                    status: 'pending',
                    desc: "Als blijkt dat je niet alle (juiste) data hebt aangeleverd is dit het moment dat je de extra gegevens aanleverd.",
                    done: false
                }
            ],
            desc: "lorem ipsum dolor sit amet si;dughunaek;j gakldng asld knfbslkd jfng sldkjfn skdjf ksdfj nskdlf nsdkfj nsndmf nsd ,sdf ",
            image: "dakkapel.jpg"
        },{
            status:'in_progress',
            title: "Steiger",
            step: 2,
            totalSteps: 8,
            person: {
                street: "Leliestraat 29",
                postalCode: "5482XK",
                city: "Eindhoven"
            },
            desc: "qwertyuiopasdfghjkl;zxcvbnm wertyuisdfghjvbn edfgbnjyhgvbnlouytgfc vbnhmnytghv",
            image: "steiger.jpg"
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
