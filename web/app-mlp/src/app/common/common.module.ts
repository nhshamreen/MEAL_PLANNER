import { NgModule } from '@angular/core';
import { CommonModule as NgCommonModule} from '@angular/common';
import {FlexLayoutModule} from '@angular/flex-layout';
import { CommonRoutingModule } from './common-routing.module';
import { LoginComponent } from './login/login.component';
import{MatFormFieldModule,MatInputModule,MatButtonModule, MatToolbarModule, MatIconModule} from '@angular/material';
import{FormsModule} from '@angular/forms';
import { SignupComponent } from './signup/signup.component';
import { WelcomeComponent } from './welcome/welcome.component';
import { ToolbarComponent } from './toolbar/toolbar.component';
@NgModule({
  imports: [
    NgCommonModule,
    FormsModule,
    MatFormFieldModule,
    MatInputModule,MatButtonModule,MatToolbarModule,MatIconModule,
    FlexLayoutModule,
    CommonRoutingModule
  ],
  declarations: [LoginComponent, SignupComponent, WelcomeComponent, ToolbarComponent], 
  exports: [FormsModule,MatFormFieldModule,MatInputModule,MatButtonModule,MatToolbarModule,MatIconModule,
    FlexLayoutModule]
})
export class CommonModule {  }
