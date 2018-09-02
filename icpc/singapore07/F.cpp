#include <stdio.h>
#include <string.h>

#define REP(i,n) for (int i=0,_n=(n); i<_n; i++)
#define FOR(i,a,b) for (int i=(a),_b=(b); i<=_b; i++)

int nTC, cost, n, box, con[510][510], nr, a,b;

int main(){
	scanf("%d",&nTC);
	while (nTC--){
		scanf("%d %d",&box,&n); n++;

		memset(con,-1,sizeof(con));

		scanf("%d",&nr);
		REP(i,nr){
			scanf("%d",&b);
			con[0][b] = 0;
		}
		
		FOR(i,1,n-1){
			scanf("%d",&nr);
			REP(j,nr){
				scanf("%d %d",&a,&b);
				if (con[i][b]==-1 || a<con[i][b]) con[i][b] = a;
			}
		}
		
		// Floyd Warshall
		REP(k,n) REP(i,n) if (con[i][k]!=-1)
			REP(j,n) if (con[k][j]!=-1){
				if (con[i][j]==-1 || con[i][j] > con[i][k] + con[k][j])
					con[i][j] = con[i][k] + con[k][j];
			}
		
		int cycleLen = 1000000000;	
		FOR(i,1,n-1) if (con[0][i]!=-1 && con[i][0]!=-1)
			cycleLen <?= con[0][i] + con[i][0];

		// Aditya KG's formula
		cycleLen--;
		int tot = box/cycleLen;
		while ((tot*cycleLen) + cycleLen+1 >= box) tot--;
		printf("%d\n",tot+1);
	}
}
