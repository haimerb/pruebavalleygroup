import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { RegistroEstablecimientoComponent } from './registro-establecimiento.component';

describe('RegistroEstablecimientoComponent', () => {
  let component: RegistroEstablecimientoComponent;
  let fixture: ComponentFixture<RegistroEstablecimientoComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ RegistroEstablecimientoComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(RegistroEstablecimientoComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
