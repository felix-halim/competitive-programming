#include <algorithm>

#define REP(i,n) for (int i=0,_n=n; i<_n; i++)

int T, N, A[2000], B[2000], C[2000];

int main(){
	scanf("%d",&T);
	while (T--){
		scanf("%d",&N);
		REP(i,N) scanf("%d",&A[i]);
		REP(i,N) scanf("%d",&B[i]); std::sort(B,B+N);
		REP(i,N) scanf("%d",&C[i]); std::sort(C,C+N);

		long long res = 0;
		REP(a,N){
			int x = -A[a];   // kita ingin B[b] + C[c] == -A[a]
			int b=0, c=N-1;  // cari b dan c dimana B[b] + C[c] == x
			while (b<N && c>=0){
				int countB = 1;
				while (b+1 < N && B[b] == B[b+1]) b++, countB++;
				while (c>=0 && B[b] + C[c] > x) c--;
				if (c<0) break;
				if (B[b] + C[c] == x){
					int countC = 1;
					while (c>0 && C[c] == C[c-1]) c--, countC++;
					res += countB * countC;
				}
				b++;
			}
		}
		printf("%lld\n",res);
	}
}
