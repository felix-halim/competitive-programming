#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <assert.h>
#include <vector>
#include <algorithm>

using namespace std;

#define REP(i,n) for (int i=0,_n=(n); i<_n; i++)
#define FOR(i,a,b) for (int i=(a),_b=(b); i<=_b; i++)

struct Node {
	int L,R,H;
	Node *left, *right;
};

int nTC,n;

int add(Node &root, int L, int R, int H){
	
}

int main(){
	scanf("%d",&nTC);
	while (nTC--){
		scanf("%d",&n);
		Node root = (Node){ 0,1000000,0 };
		int res = 0,a,b,c;
		REP(i,n){
			scanf("%d %d %d",&a,&b,&c);
			res += add(root,a,b,c);
		}
		printf("%d\n",res);
	}
}

