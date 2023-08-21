import {
  Component,
  ElementRef,
  OnDestroy,
  OnInit,
  ViewChild,
} from '@angular/core';
import { CategorieService } from '../shared/services/categorie.service';
import { RestReponse } from '../shared/interfaces/rest-reponse';
import { Categorie } from '../shared/interfaces/categorie';
import { Action } from '../shared/interfaces/action';
import { Subscriber } from 'rxjs';

@Component({
  selector: 'app-categorie',
  templateUrl: './categorie.component.html',
  styleUrls: ['./categorie.component.css'],
})
export class CategorieComponent implements OnInit, OnDestroy {
  response: RestReponse<Categorie> = <RestReponse<Categorie>>{};
  subscriber$: any;
  url?: string;
  mode: Action = Action.Add;
  checkAll: boolean = false;
  categoriesId: number[] = [];
  readonly Action = Action;
  @ViewChild('checkboxAll', { static: false }) CheckboxAllElt!: ElementRef;
  constructor(private catServ: CategorieService) {}
  ngOnDestroy(): void {
    this.subscriber$.unsubscribe();
  }

  ngOnInit(): void {
    this.refresh();
  }
  refresh() {
    this.subscriber$ = this.catServ
      .all(this.url)
      .subscribe((res: RestReponse<Categorie>) => {
        this.response = res;
      });
  }
  pagination(url?: string) {
    this.url = url;
    this.refresh();
  }

  onAddOrRemoveId(event: Event, checkboxAll: HTMLInputElement) {
    let element = event.target as HTMLInputElement;
    this.categoriesId.push(+element.value);
    if (!element.checked) {
      this.CheckboxAllElt.nativeElement.checked = false;
      this.categoriesId = this.categoriesId.filter(
        (id) => id != +element.value
      );
    } else {
      this.CheckboxAllElt.nativeElement.checked =
        this.categoriesId.length == this.response?.data.length;
    }
  }

  onCheckAll(event: Event) {
    let element = event.target as HTMLInputElement;
    this.checkAll = element.checked;
    this.categoriesId = [];
    if (element.checked) {
      this.categoriesId = this.response.data.map(
        (category: Categorie) => category.id
      );
    }
  }

  onDeleteCategory() {
    this.catServ.delete(this.categoriesId).subscribe((res) => {
      if (res.success) {
        this.response.data = this.response?.data.filter(
          (categorie: Categorie) =>
            !this.categoriesId.includes(categorie.id as number)
        );
      }
    });
  }
}
