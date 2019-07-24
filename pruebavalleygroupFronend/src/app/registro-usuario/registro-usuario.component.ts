import { Component, OnInit } from '@angular/core';
import { FormControl, FormGroup,  FormBuilder,  Validators } from '@angular/forms';
import { RestService } from '../_services/rest.service';

@Component({
  selector: 'app-registro-usuario',
  templateUrl: './registro-usuario.component.html',
  styleUrls: ['./registro-usuario.component.css']
})
export class RegistroUsuarioComponent implements OnInit {

  public flagShowLogin: boolean;
  angForm: FormGroup;
  public userName : FormControl;
  password : FormControl;
  private formSubmitAttempt: boolean;
  
  constructor(public restservice:RestService,  private fb: FormBuilder) { 

    this.userName = new FormControl("", Validators.compose([Validators.required, Validators.minLength(5)]));
    this.password = new FormControl();
    this.angForm = new FormGroup({userName:this.userName, password:this.password});
    this.flagShowLogin=true;
  }

  isFieldInvalid(field: string) {
    return (
      (!this.angForm.get(field).valid && this.angForm.get(field).touched) ||
      (this.angForm.get(field).untouched && this.formSubmitAttempt)
    );
  }

  ngOnInit() {
  }

}
