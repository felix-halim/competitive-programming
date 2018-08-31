#include <stdio.h>

#define REP(i,n) for (int i=0,_n=n; i<_n; i++)

int T,N,P[51][51];

int main(){
	scanf("%d",&T);
	while (T--){
		scanf("%d",&N);
		REP(i,N) REP(j,N) scanf("%d",&P[i][j]);
		int res = 0;
		REP(i,N) REP(j,N) REP(k,N)
			if (i!=j && i!=k && j!=k)
				res >?= P[i][j] * P[j][k] * P[k][i];
		printf("%d\n",res);
	}
}
