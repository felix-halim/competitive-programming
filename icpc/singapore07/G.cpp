#include <stdio.h>
#include <string.h>
#include <vector>
#include <algorithm>

using namespace std;

#define REP(i,n) for (int i=0,_n=(n); i<_n; i++)
#define FOR(i,a,b) for (int i=(a),_b=(b); i<=_b; i++)

#define MAXN 10010

// Union-Set algorithm
int pset[MAXN];
void initset(){ REP(i,MAXN) pset[i] = i; }
int findSet(int i){ return (pset[i]==i)? i: (pset[i] = findSet(pset[i])); }
void merge(int i, int j){ pset[findSet(i)] = findSet(j); }
int sameSet(int i, int j){ return findSet(i)==findSet(j); }

int nTC,n,m;
char vis[MAXN];

int main(){
	scanf("%d",&nTC);
	while (nTC--){
		scanf("%d %d",&n,&m);
		vector<pair<int,pair<int,int> > > junc;
		REP(i,m){
			int a,b,c;
			scanf("%d %d %d",&a,&b,&c); a--; b--;
			junc.push_back(make_pair(c,make_pair(a,b)));
		}

		// sort edges descending by weight
		sort(junc.rbegin(), junc.rend());

		memset(vis,0,sizeof(vis));
		initset();
		int res = 0;
		REP(i,junc.size()){
			int a = junc[i].second.first;
			int b = junc[i].second.second;
			int c = junc[i].first;
			if (sameSet(a,b)) res += c;
			else merge(a,b);
		}
		printf("%d\n",res);
	}
}
