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

#define INF 1000000000
#define MAXN 203

int con[MAXN][MAXN], n;
char temp[1000], task[MAXN];

class State { public :
	map<int,bool> used;
	int days;
	State(){
		used.clear();
		days = 0;
	}
	bool operator<(State const &that) const {
		return days > that.days;
	}
};

char considered[MAXN], visited[MAXN];

bool dfs(int i, State &u, State &nu){
	REP(j,MAXN) if (con[i][j] && con[j][i] && !u.used.count(j) && nu.used.count(j)) return false;
	return true;
}

bool allPredOk(int i, State &u){
	REP(j,MAXN) if (con[j][i] && !con[i][j] && !u.used.count(j)) return false;
	return true;
}

int getDepth(int i){
	int ret = 1;
	REP(j,MAXN) if (con[i][j] && !con[j][i]) ret += getDepth(j);
	return ret;
}

int main(){
	freopen("pg.in","r",stdin);
	while (scanf("%d",&n)!=EOF && n){
		memset(con,0,sizeof(con));
		memset(task,0,sizeof(task));
		do {
			task[n-1] = true;
			while (scanf("%s",temp)!=EOF && strcmp(temp,"0")!=0){
				int len = strlen(temp);
				if (isdigit(temp[len-1])){
					int m = atoi(temp);
					con[n-1][m-1] = con[m-1][n-1] = true;
					task[m-1] = true;
				} else if (temp[len-1]=='u'){
					temp[len-1] = '\0';
					int m = atoi(temp);
					con[m-1][n-1] = true;
					task[m-1] = true;
				} else if (temp[len-1]=='d'){
					temp[len-1] = '\0';
					int m = atoi(temp);
					con[n-1][m-1] = true;
					task[m-1] = true;
				}
			}
		} while (scanf("%d",&n)!=EOF && n);

		int nTask = 0;
		REP(i,MAXN) if (task[i]) nTask++;

		priority_queue<State> pq;
		pq.push(State());
		while (pq.size()>0){
			State u = pq.top(); pq.pop();

			if (u.used.size()==nTask){
				printf("%d\n",u.days);
				goto found;
			}

			State nu = u;
			nu.days = u.days + 1;

			vector<pair<int,int> > pos;
			REP(i,MAXN) if (task[i] && allPredOk(i,u) && !u.used.count(i))
				pos.push_back(make_pair(getDepth(i),i));
			sort(pos.begin(),pos.end());
			FORD(i,pos.size()-1,0){
				int j = pos[i].second;
				if (allPredOk(j,nu) && dfs(j,u,nu))
					nu.used[j] = true;
			}

			if (u.used.size() != nu.used.size()) pq.push(nu);
		}

		puts("not found");
		found:;
	}
}
