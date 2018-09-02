#include <stdio.h>
#include <string.h>

#define REP(i,n) for (int i=0,_n=(n); i<_n; i++)
#define FOR(i,a,b) for (int i=(a),_b=(b); i<=_b; i++)

int nTC,s,t;
char con[550][550], temp[10];
int memo[550][550];

int rec(int time, int idx){
	if (idx==s) return time;
	if (time>=t) return 1000;
	int &ret = memo[time][idx];
	if (ret!=-1) return ret; else ret = 1000;
	if (con[time][idx]==0) return ret;
	
	FOR(i,time,t-1){
		if (con[i][idx]==0) break;
		if (con[i][idx+1]) ret <?= rec(i+1, idx+1);
		if (idx>0 && con[i][idx-1]) ret <?= rec(i+1, idx-1);
	}
	return ret;
}

int main(){
	scanf("%d",&nTC);
	while (nTC--){
		scanf("%d %d",&s,&t);
		memset(con,0,sizeof(con));
		REP(i,t){
			REP(j,s){
				scanf("%s",temp);
				con[i][j] = temp[0];
			}
			con[i][s] = 1;
		}
		REP(i,s){
			int c = 1;
			REP(j,t){
				if (con[j][i]=='u'){
					con[j][i] = c;
				} else if (con[j][i]=='r'){
					con[j][i] = c = 1;
				} else {
					con[j][i] = c = 0;
				}
			}
		}
		con[t][s] = 1;

		memset(memo,-1,sizeof(memo));
		int res = 1000;
		REP(i,t-1) if (con[i][0]) res <?= rec(i+1,0);
		if (res>=1000) puts("-1");
		else printf("%d\n",res);
	}
}
