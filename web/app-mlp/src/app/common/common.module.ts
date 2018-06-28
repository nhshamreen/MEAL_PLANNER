import { NgModule } from '@angular/core';
import { CommonModule as NgCommonModule} from '@angular/common';
import {FlexLayoutModule} from '@angular/flex-layout';
import { CommonRoutingModule } from './common-routing.module';
import { LoginComponent } from './login/login.component';
import{MatFormFieldModule,MatInputModule,MatButtonModule} from '@angular/material';
import{FormsModule} from '@angular/forms';
@NgModule({
  imports: [
    NgCommonModule,
    FormsModule,
    MatFormFieldModule,
    MatInputModule,MatButtonModule,
    FlexLayoutModule,
    CommonRoutingModule
  ],
  declarations: [LoginComponent], 
  exports: [FormsModule,MatFormFieldModule,MatInputModule,MatButtonModule,FlexLayoutModule]
})
export class CommonModule {  }
