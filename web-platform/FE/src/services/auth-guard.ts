import { Injectable } from '@angular/core';
import { ActivatedRouteSnapshot, CanActivate, Router } from '@angular/router';
import { catchError, Observable, of } from 'rxjs';
import { map } from 'rxjs/operators';
import {AuthService} from "./auth.service";

@Injectable({
  providedIn: 'root'
})
export class RoleGuard implements CanActivate {

  constructor(private authService: AuthService, private router: Router) {
  }

  getUserRole(): Observable<string[] | null> {
    return this.authService.fetchCurrentUser().pipe(
      map(currentUser => {
        console.log(currentUser)
        this.authService.currentUserSubject.next(currentUser);
        return currentUser ? currentUser.roles : null}),
      catchError(error => {
        console.error('Error fetching user:', error);
        return of(null);
      })
    );
  }

  canActivate(route: ActivatedRouteSnapshot): Observable<boolean> {
    const expectedRole = route.data['expectedRole'];

    return this.getUserRole().pipe(
      map(role => {
        if (role && role.includes(expectedRole)) {
          return true;
        } else {
          this.router.navigate(['Home']);
          return false;
        }
      }),
      catchError(error => {
        console.error('Error in canActivate:', error);
        this.router.navigate(['Home']);
        return of(false);
      })
    );
  }
}
