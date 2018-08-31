#include <stdio.h>

int T,N,res[100001];

int main(){
	res[1] = 1;
	for (long long i=2,a=1,b=2; i<=100000; i++, a+=b, b++)
		res[i] = res[i-1] * a % 1000000007;

	scanf("%d",&T);
	while (T--){
		scanf("%d",&N);
		printf("%d\n",res[N]);
	}
}
