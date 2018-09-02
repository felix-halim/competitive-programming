#include <stdio.h>
#include <stdlib.h>
#include <math.h>

#define FOR(i,a,b) for(int i=(a),_b=(b); i<=b; i++)
#define FORD(i,a,b) for(int i=(a),_b=(b); i>=b; i--)
#define REP(i,n) for(int i=0,_n=(n); i<_n; i++)

#define INF 1000000000
#define MAXN 10003

int pset[MAXN];
void initset(int n){ REP(i,n+2) pset[i] = i; }
int findSet(int i){ return (pset[i]==i)? i : (pset[i] = findSet(pset[i])); }
void merge(int i, int j){ pset[findSet(i)] = findSet(j); }
int sameSet(int i, int j){ return findSet(i)==findSet(j); }

int ps[MAXN][2], nP, nDs;

typedef struct {
	int a, b;
	long long dist;
} Line;

Line ds[MAXN*MAXN];

int linecmp(const void *a, const void *b){
	Line *la = (Line*) a;
	Line *lb = (Line*) b;
	if (la->dist < lb->dist) return -1;
	if (la->dist > lb->dist) return 1;
	return 0;
}

int main(){
	freopen("pb.in","r",stdin);
	int nTC, n, x,y;
	scanf("%d",&nTC);
	while (nTC--){
		scanf("%d",&n);
		nP = 0;
		while (scanf("%d",&x)!=EOF && x!=-1){
			scanf("%d",&y);
			ps[nP][0] = x;
			ps[nP][1] = y;
			nP++;
		}

		nDs = 0;
		REP(i,nP) REP(j,nP){
			ds[nDs].a = i;
			ds[nDs].b = j;
			long long dx = ps[i][0] - ps[j][0];
			long long dy = ps[i][1] - ps[j][1];
			ds[nDs].dist = dx*dx + dy*dy;
			nDs++;
		}

		qsort(ds, nDs, sizeof(Line), linecmp);
		int curN = nP;
		long long lastDist;
		initset(nP);
		REP(i,nDs){
			if (curN==n) break;
			if (!sameSet(ds[i].a, ds[i].b)){
				merge(ds[i].a, ds[i].b);
				lastDist = ds[i].dist;
				curN--;
			}
		}

		printf("%.0lf\n",ceil(sqrt(lastDist)));
	}
}
