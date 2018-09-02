#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <assert.h>
#include <math.h>
#include <vector>
#include <algorithm>

using namespace std;

#define REP(i,n) for (int i=0,_n=(n); i<_n; i++)
#define FOR(i,a,b) for (int i=(a),_b=(b); i<=_b; i++)

int nTC,n,k;

struct Point {
	int x, y, idx;
	double a;
};

Point ps[2010];
double pi = 2*acos(0);

double cangle(int x1, int y1, int x2, int y2){
	int dx = x2-x1, dy = y2-y1;
	return atan2(dy,dx);
}

bool half(double a){
	return fmod(a+pi, pi) <= pi/2.0;
}

int itung(int len){
	int ret = 0;
	if (len==k) ret++;
	if (n-len==k) ret++;
//	printf("len = %d, %d\n",len,ret);
	return ret;
}

int anglecmp(const void *a, const void *b){
	Point *pa = (Point*) a;
	Point *pb = (Point*) b;
	if (pa->a < pb->a) return -1;
	if (pa->a > pb->a) return 1;
	return 0;
}

int calc(int p){
	REP(i,n) if (ps[i].idx!=p) ps[i].a = cangle(ps[p].x,ps[p].y, ps[i].x,ps[i].y);
	qsort(ps,n,sizeof(ps[0]),anglecmp);

	int back= ps[0].idx==p?1:0, len = 0,ret=0;	
	REP(i,n) if (ps[i].idx!=p){
		while (!half(ps[i].a-ps[back].a)){
			back++;
			len--;
		}
		printf(">%d = %d\n",i,len);
		ret += itung(len+2);
		len++;
	}
	return ret;
}

int main(){
	scanf("%d",&nTC);
	while (nTC--){
		scanf("%d %d",&n,&k);
		REP(i,n){
			scanf("%d %d",&ps[i].x, &ps[i].y);
			ps[i].idx = i;
		}
		int res = 0;
		REP(i,n){
			int t = calc(i);
			printf("i=%d, c=%d\n",i,t);
			res += t;
		}
		printf("%d\n",res);
	}
}

