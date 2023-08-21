import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';

import { HttpClientModule } from '@angular/common/http';

import { AppComponent } from './app.component';
import { CategorieComponent } from './categorie/categorie.component';

@NgModule({
  declarations: [AppComponent, CategorieComponent],
  imports: [
    BrowserModule,
    HttpClientModule,
   
  ],
  exports: [],
  providers: [],
  bootstrap: [AppComponent],
})
export class AppModule {}
