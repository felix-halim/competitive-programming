#include <stdio.h>

int data[10001];
int dpmat[10001];

int main(){
	int tcase;
	freopen("pa.in","r",stdin);
	scanf("%d", &tcase);
	while (tcase--){
		int n,m;
		scanf("%d", &m);
		scanf("%d", &n);
		data[0] = 0;
		for (int i=1; i<=n; i++){
			scanf("%d", &data[i]);
		}		
		dpmat[0] = 0;
		for (int i=1; i<=n; i++){
			int pen = m - data[i];
			pen *= pen;
			dpmat[i] = dpmat[i-1] + pen;
			int j = i-1;
			int d = data[i];
			while (d<=m && j>=0){
				pen = m - d;
				pen *= pen;
				int t = dpmat[j] + pen;
				if (t < dpmat[i]) dpmat[i] = t;
				d += data[j] + 1;
				j--;
			}
		}
		printf("%d\n", dpmat[n]);
	}
}
