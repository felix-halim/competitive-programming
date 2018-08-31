#include <stdio.h>
#include <string>
#include <algorithm>

using namespace std;

char s[1000];
int T;

int main(){
	scanf("%d",&T);
	while (T--){
		scanf("%s",s);
		string r = "";
		for (int i=0; s[i]; i++){
			if (s[i]=='+') r += s[++i];
			else reverse(r.begin(),r.end());
		}
		puts(r.c_str());
	}
}
