#include <stdio.h>
#include <string.h>
#include <vector>
#include <algorithm>

using namespace std;

#define FOR(i,a,b) for (int i=(a),_b=(b); i<=_b; i++)
#define REP(i,n) for (int i=0,_n=(n); i<_n; i++)

char s[10010];
int len;

bool ok(int n){
	vector<int> stk(n,1000);
	REP(i,len){
		sort(stk.begin(),stk.end());
		bool hasPlace = false;
		REP(j,n){
			if (stk[j]>=s[i]){
				stk[j] = s[i];
				hasPlace = true;
				break;
			}
		}
		if (!hasPlace) return false;
	}
	return true;
}

int main(){
	freopen("containers.in","r",stdin);
	for (int TC=1; gets(s) && strcmp(s,"end")!=0; TC++){
		len = strlen(s);
		int lo = 1, hi = len, res = -1;
		while (lo<=hi){
			int med = (lo+hi)/2;
			if (ok(med)){
				res = med;
				hi = med-1;
			} else {
				lo = med+1;
			}
		}
		printf("Case %d: %d\n",TC,res);
	}
}
