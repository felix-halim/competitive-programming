#include <stdio.h>
#include <string.h>
#include <vector>
#include <set>
#include <map>
#include <string>
#include <algorithm>

using namespace std;

#define FOR(i,a,b) for (int i=(a),_b=(b); i<=_b; i++)
#define REP(i,n) for (int i=0,_n=(n); i<_n; i++)
#define FOREACH(it,arr) for (__typeof((arr).begin()) it= (arr).begin(); it!=(arr).end(); it++)

int n, m, sizes[5], perm[5], incoming[1010][3];
map<int,int> to[5];
int pos[5];

void advance(int num, int &bsize) {
	while (to[num].count(pos[num]+1)){
		bsize -= to[num][pos[num]+1] - pos[num];
		pos[num] = to[num][pos[num]+1];
	}
}

int calc(){
	REP(i,n){
		pos[i] = 0;
		to[i].clear();
	}

	int cmidx = 0, bsize = 0, maxbsize =0;
	REP(i,m){
		int num = incoming[i][0] - 1;
		to[num][incoming[i][1]] = incoming[i][2];
//		printf("set %d -> %d, posnum=%d,num=%d,p=%d,sz=%d\n",incoming[i][1],incoming[i][2],pos[num],num,perm[cmidx],sizes[num]);

		if (to[num].count(pos[num]+1) && num==perm[cmidx]){
			pos[num] = to[num][pos[num]+1];
			advance(num,bsize);
		} else {
			bsize += incoming[i][2] - incoming[i][1] + 1;
			maxbsize = max(maxbsize,bsize);
		}

		while (cmidx<n && num==perm[cmidx] && pos[num]==sizes[num]){
			cmidx++;
			if (cmidx<n) advance(perm[cmidx],bsize);
		}
//		printf("i=%d, %d\n",i,bsize);
	}
	return maxbsize;
}

int main(){
	freopen ( "network.in", "r", stdin ) ;
	for (int TC=1; scanf("%d %d", &n, &m) != EOF && (n||m); TC++){
		int res = 0;
		REP(i,n){
			scanf("%d",&sizes[i]);
			perm[i] = i;
			res += sizes[i];
		}

		REP(i,m) REP(j,3) scanf("%d", &incoming[i][j]);

		do {
			int t = calc();
			//REP(i,n) printf("%d ",perm[i]); printf("%d\n",t); puts("");

			res = min(res,t);
		} while (next_permutation(perm,perm+n));

		printf("Case %d: %d\n\n",TC,res);
	}
}
