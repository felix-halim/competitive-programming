#include <stdio.h>
#include <ctype.h>
#include <stdlib.h>
#include <string.h>
#include <vector>
#include <map>
#include <queue>
#include <algorithm>

using namespace std;

#define FOR(i,a,b) for(int i=(a),_b=(b); i<=b; i++)
#define FORD(i,a,b) for(int i=(a),_b=(b); i>=b; i--)
#define REP(i,n) for(int i=0,_n=(n); i<_n; i++)

#define MAXN 10001
#define INF 20000
#define VI vector<int>

VI toedges[MAXN];
VI edge[MAXN];
int visited[MAXN];
int dpmat[MAXN][3];
// 0=needing server
// 1=don't need server
// 2=is a server

void shoot(int to){
	visited[to] = 1;
	dpmat[to][0] = 0;
	dpmat[to][2] = 1;
	REP(i,toedges[to].size()){
		int b = toedges[to][i];
		if (!visited[b]){
			edge[to].push_back(b);
			shoot(b);
			dpmat[to][0] += dpmat[b][1];
			dpmat[to][2] += dpmat[b][0] <? dpmat[b][2];
			dpmat[to][0] <?= INF;
			dpmat[to][2] <?= INF;
		}
	}

	dpmat[to][1] = INF;
	int nn = edge[to].size();
	REP(i,nn){
		int t = dpmat[edge[to][i]][2];
		REP(j,nn) if (j!=i) t += dpmat[edge[to][j]][1];
		dpmat[to][1] <?= t;
	}
}

int main(){
	freopen("pi.in","r",stdin);

	int n, a, b;
	scanf("%d",&n);
	while (n!=-1){
		REP(i,n) toedges[i].clear(), edge[i].clear();
		FOR(i,1,n-1){
			scanf("%d %d",&a,&b); a--; b--;
			toedges[a].push_back(b);
			toedges[b].push_back(a);
		}

		if (n==0) puts("0");
		else {
			memset(visited,0,sizeof(visited));
			shoot(0);
			printf("%d\n", dpmat[0][1] <? dpmat[0][2]);
		}

		scanf("%d",&n);
		if (n==-1) break;
		if (n==0) scanf("%d",&n);
	}
}
