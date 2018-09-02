#include <stdio.h>
#include <string.h>

#define REP(i,n) for (int i=0,_n=(n); i<_n; i++)

#define MAXN 2001

int memo[MAXN][MAXN];
int tree[MAXN][MAXN];
int t,h,f,a,n,nTC;

int rec(int hi, int ti){
	if (hi>=h) return 0;
	int &ret = memo[hi][ti];
	if (ret!=-1) return ret;
	ret = tree[ti][hi] + rec(hi+1,ti);
	REP(i,t) ret >?= tree[ti][hi] + rec(hi+f, i);
	return ret;
}

int main(){
	scanf("%d",&nTC);
	while(nTC--){
		memset(memo,-1,sizeof(memo));
		memset(tree,0,sizeof(tree));

		scanf("%d %d %d",&t,&h,&f);
		REP(i,t){
			scanf("%d",&a);
			REP(j,a){
				scanf("%d",&n);
				tree[i][n-1]++;
			}
		}

		int res = 0;
		REP(i,t) res >?= rec(0,i);
		printf("%d\n",res);
	}
}

