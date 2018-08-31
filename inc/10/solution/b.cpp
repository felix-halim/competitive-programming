#include <stdio.h>

#define p(N) ((N-2)/K + 1)

int K;

int f(int A, int B){
	if (A > B) return f(p(A),B);
	if (A < B) return f(A,p(B));
	return A; // A = B = X
}

int main(){
	int T,A,B;
	scanf("%d",&T);
	while (T--){
		scanf("%d %d %d",&K,&A,&B);
		printf("%d\n",f(A,B));
	}
}
