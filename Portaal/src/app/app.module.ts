import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { AppComponent } from './app.component';
import { HomeComponent } from './home/home.component';
import { NavComponent } from './nav/nav.component';
import { LoginComponent } from './login/login.component';
import { ContactComponent } from './contact/contact.component';
import { SearchComponent } from './search/search.component';
import {AuthGuardService} from "./auth-guard.service";
import {GuestGuardService} from "./guest-guard.service";
import {CustomConfig, Ng2UiAuthModule} from "ng2-ui-auth";
import {FormsModule} from "@angular/forms";
import { DashboardComponent } from './dashboard/dashboard.component';
import {ApiService} from "./api.service";
import {BrowserAnimationsModule} from '@angular/platform-browser/animations';
import {
    MatButtonModule, MatDialogModule, MatExpansionModule, MatProgressSpinnerModule,
    MatRadioModule
} from "@angular/material";
import { StepDialogComponent } from './step-dialog/step-dialog.component';
import { FaqComponent } from './faq/faq.component';
import { QuestionsComponent } from './questions/questions.component';
import { GovernmentDashboardComponent } from './government-dashboard/government-dashboard.component';
export class AuthConfig extends CustomConfig {
    defaultHeaders = {"Content-Type": 'application/json'};
    loginUrl = 'http://localhost/hackathon_api/auth';
    authHeader = "auth";
}

const routes: Routes = [
  {
    path: "",
    component:  HomeComponent,
      canActivate: [AuthGuardService]
  },
  {
    path: "login",
    component: LoginComponent,
      canActivate: [GuestGuardService]
  },
    {
        path: "dashboard",
        component: DashboardComponent,
        canActivate: [AuthGuardService]
    },
    {
        path: "question",
        component: FaqComponent,
        canActivate: [AuthGuardService]
    },
    {
        path: "aanvraag",
        component: QuestionsComponent,
        canActivate: [AuthGuardService]
    },
  {
    path: "search",
    component: SearchComponent,
    canActivate: [AuthGuardService]
  },
    {
        path: "dashboard-g",
        component: GovernmentDashboardComponent,
        canActivate: [AuthGuardService]
    }
];

@NgModule({
  declarations: [
    AppComponent,
    HomeComponent,
    NavComponent,
    LoginComponent,
    ContactComponent,
    DashboardComponent,
    StepDialogComponent,
    FaqComponent,
    SearchComponent,
    QuestionsComponent,
    GovernmentDashboardComponent
  ],
  imports: [
    BrowserModule,
      FormsModule,
    RouterModule.forRoot(routes),
    Ng2UiAuthModule.forRoot(AuthConfig),
      BrowserAnimationsModule,
      MatButtonModule,
      MatDialogModule,
      MatRadioModule,
      MatProgressSpinnerModule,
      MatExpansionModule
  ],
  providers: [AuthGuardService, GuestGuardService, ApiService],
  bootstrap: [AppComponent],
    entryComponents: [StepDialogComponent]
})
export class AppModule { }