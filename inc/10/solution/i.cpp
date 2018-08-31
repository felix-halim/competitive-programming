#include <stdio.h>

#define REP(i,n) for (int i=0,_n=n; i<_n; i++)

int T,N,M,K,X,dp[2][102][102];

int main(){
	scanf("%d",&T);
	while (T--){
		scanf("%d %d %d",&N,&M,&K);
		REP(i,N) REP(j,M){
			int (*c)[102] = dp[i%2];
			int (*p)[102] = dp[1-(i%2)];
			scanf("%d",&X);
			if (i==0){
				REP(k,K+1) c[j][k] = 0;
				c[j][0] = X;
			} else {
				REP(k,K+1) c[j][k] = p[j][k] + X;
				REP(k,K+1) REP(m,M)
					c[j][k+(j==m?0:1)] >?= p[m][k] + X;
			}
		}
		int res = 0;
		REP(i,M) REP(j,K+1) res >?= dp[1-N%2][i][j];
		printf("%d\n",res);
	}
}
