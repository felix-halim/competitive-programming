#include <stdio.h>
#include <stdlib.h>
#include <vector>
#include <queue>
#include <algorithm>

using namespace std;

#define FOR(i,a,b) for(int i=(a),_b=(b); i<=b; i++)
#define FORD(i,a,b) for(int i=(a),_b=(b); i>=b; i--)
#define REP(i,n) for(int i=0,_n=(n); i<_n; i++)

#define INF 1000000000
#define MAXN 101
#define VI vector<int>

char line[10000];
int con[MAXN][MAXN], n, r;

class State { public :
	VI needVis;
	int dist;
	State (VI &nv){
		needVis = nv;
		dist = 0;
	}
	bool operator<(State const &that) const {
		return dist > that.dist;
	}
};

int main(){
	freopen("pe.in","r",stdin);
	sscanf(gets(line),"%d %d",&n,&r);
	REP(i,n){
		int j = 0, t;
		for (char *p = strtok(gets(line)," "); p; p = strtok(NULL," ")){
			sscanf(p,"%d",&t);
			con[i][j++] = t==0? INF : t;
		}
	}
	REP(i,n) con[i][i] = 0;
	REP(i,r){
		VI needVisited;
		for (char *p = strtok(gets(line)," "); p; p = strtok(NULL," ")){
			int t = atoi(p)-1;
			needVisited.push_back(t);
		}

		priority_queue<State> pq;
		pq.push(State(needVisited));
		while (pq.size()>0){
			State u = pq.top(); pq.pop();
			int spot = u.needVis[0];
			REP(j,u.needVis.size()-1) u.needVis[j] = u.needVis[j+1];
			u.needVis.pop_back();

			if (u.needVis.size()==0){
				printf("%d\n",u.dist);
				goto found;
			}

			if (u.needVis.size()==1){
				int nspot = u.needVis[0];
				if (con[spot][nspot]!=INF){
					State v = u;
					v.dist = u.dist + con[spot][nspot];
					pq.push(v);
				}
			} else {
				REP(j,u.needVis.size()-1){
					int nspot = u.needVis[j];
					if (con[spot][nspot]!=INF){
						State v = u;
						v.dist = u.dist + con[spot][nspot];
						swap(v.needVis[0], v.needVis[j]);
						pq.push(v);
					}
				}
			}
		}
		puts("0");
		found:;
	}
}
