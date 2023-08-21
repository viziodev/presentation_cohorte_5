import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { RestReponse } from '../interfaces/rest-reponse';
import { Categorie } from '../interfaces/categorie';
import { environment } from 'src/environments/environment';

@Injectable({
  providedIn: 'root',
})
export class CategorieService {
  constructor(private http: HttpClient) {}
  private uri(): string {
    return 'categories';
  }
  all(url?: string): Observable<RestReponse<Categorie>> {
    url = url ?? `${environment.api.url}/${this.uri()}`;
    return this.http.get<RestReponse<Categorie>>(url);
  }

  delete(categories:number[]):Observable<RestReponse<Categorie>> {
     return this.http.delete<RestReponse<Categorie>>(
       `${environment.api.url}/${this.uri()}/1`,
       {
         headers: new HttpHeaders({
           'Content-Type': 'application/json',
           'Accept': 'application/json',
         }),
         body: {
            categories,
         },
       }
     );
  }
}
