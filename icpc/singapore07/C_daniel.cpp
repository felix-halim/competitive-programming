#include <stdio.h>
#include <string.h>

#define REP(i,n) for (int i=0,_n=(n); i<_n; i++)
#define FORD(i,a,b) for (int i=(a),_b=(b); i>=_b; i--)

#define MAXN 2007

int dp[MAXN];
int tree[MAXN][MAXN];
int t,h,f,a,n,nTC;

int main(){
	scanf("%d",&nTC);
	while(nTC--){
		memset(dp,0,sizeof(dp));
		memset(tree,0,sizeof(tree));

		scanf("%d %d %d",&t,&h,&f);
		REP(i,t){
			scanf("%d",&a);
			REP(j,a){
				scanf("%d",&n);
				tree[i][n]++;
			}
		}

		FORD(i,h,1) REP(j,t){
			int best = tree[j][i+1];
			best >?= dp[i+f];
			best += tree[j][i];
			tree[j][i] = best;
			dp[i] >?= best;
		}
		printf("%d\n",dp[1]);	
	}	
}
