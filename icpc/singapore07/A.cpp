#include <stdio.h>

int pow(int x, int y, int n){
	if (y==0) return 1;
	int t = pow(x,y/2,n);
	if (y%2==0) return (t*t) % n;
	return (((t*t)%n) * x) % n;
}

int main(){
	int nTC, x,y,n;

	scanf("%d",&nTC);
	while (nTC--){
		scanf("%d %d %d",&x,&y,&n);
		printf("%d\n",pow(x,y,n));
	}
}

