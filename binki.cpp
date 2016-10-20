#include <iostream>
#include <math.h>
#include <algorithm>
using namespace std;
#define POTEGA(i) ( 1.0 / (pow(2, (i) + 1)))

string tobin(double);
double todec(string);

int main(){
//========================================================	WPROWADZANIE
	double a = NULL;
	string b;
	
	cout << "Podaj liczbe zmiennoprzec. do zamiany: ";
	cin >> a;
	//========== ERR
	if ( (a == NULL ) || ( a >= 1) ) {
		cout << "Niepoprawne dane";
		return -1;
	}
//========================================================	TOBIN
	//========== Przelicz
	b = tobin(a);
	//========== Wypisz	
	cout << "0." << b <<endl<<endl;	
//========================================================	TODEC
	double c;
	//========== Przelicz
	c = todec(b);
	//========== Wypisz				
	cout << "Sprawdzenie:" << c * 1.0;
	
return 0;
}
//========================================================	END MAIN
//========================================================	FUNKCJE

	//========== ZMIANA NA BINARKE
string tobin(double a ){
	string b="";
	while (a != 0){
		
		a *= 2;		
		if (a >= 1.0){
			b = b + '1';
			a = a - 1.0;
		}
		else b = b + '0';		
	}		
	
return b;		
}

	//========== ZMIANA NA DZIESIETNE
double todec(string b){
	double c = 0;
	for (int i = 0; i < b.length(); i++ ){
		if ( b[i] == '1' ) c = c + POTEGA(i);
	}		
	
return c;	
}


