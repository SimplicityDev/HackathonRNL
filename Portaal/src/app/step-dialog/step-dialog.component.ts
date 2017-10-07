import {Component, Inject, OnInit} from '@angular/core';
import {MAT_DIALOG_DATA, MatDialogRef} from "@angular/material";

@Component({
  selector: 'app-step-dialog',
  templateUrl: './step-dialog.component.html',
  styleUrls: ['./step-dialog.component.css']
})
export class StepDialogComponent implements OnInit {

  constructor(private dialog: MatDialogRef<StepDialogComponent>, @Inject(MAT_DIALOG_DATA) public data: any) { }

  ngOnInit() {

  }

  close(){
    this.dialog.close();
  }
}
