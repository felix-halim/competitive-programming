#include <stdio.h>
#include <ctype.h>
#include <stdlib.h>
#include <string.h>
#include <vector>
#include <ext/hash_map>
#include <string>
#include <algorithm>

using namespace std;
using namespace __gnu_cxx;

#define FOR(i,a,b) for(int i=(a),_b=(b); i<=b; i++)
#define FORD(i,a,b) for(int i=(a),_b=(b); i>=b; i--)
#define REP(i,n) for(int i=0,_n=(n); i<_n; i++)

#define INF 1000000000
#define MAXN 101
#define VI vector<int>

namespace __gnu_cxx {
	template<> struct hash< std::string >{
		size_t operator()( const std::string& x ) const{
			return hash< const char* >()( x.c_str() );
		}
	};
}

hash_map<string,bool> dict;
char cypher[10000], temp[10000], temp2[10000];
int theK;

pair<int,string> solve(char *s, int prevLen){
	pair<int,string> ret = make_pair(INF,"");
	char t[300];
	for (int i=0; s[i]; i++){
		t[i] = s[i];
		t[i+1] = '\0';
		if (prevLen==1 && i==0) continue;
		string st(t);
		if (dict.count(t)){
			if (s[i+1]=='\0'){
				pair<int,string> res = make_pair(1,st);
				if (res.first < ret.first) ret = res;
			} else {
				pair<int,string> res = solve(s+i+1, i+1);
				res.first++;
				res.second = st + " " + res.second;
				if (res.first < ret.first) ret = res;
			}
		}
	}
	return ret;
}

int main(){
	freopen("pf.in","r",stdin);

	FILE *fdict = fopen("/usr/share/dict/american-english","r");
	while (fscanf(fdict,"%s",temp)!=EOF){
		bool ok = true;
		int len = strlen(temp);
		REP(i,len) if (!isalpha(temp[i]) || tolower(temp[i])!=temp[i]) ok = false;
		if (ok) dict[string(temp)] = true;
	}
	fclose(fdict);

	while (gets(cypher) && strcmp(cypher,"0")!=0){
		pair<int,string> res = make_pair(INF,"");
		REP(k,26){
			REP(i,strlen(cypher)){
				int t = cypher[i] - 'a';
				temp2[i] = ((t-k+26)%26) + 'a';
			}
			pair<int,string> t = solve(temp2,-1);
			if (t.first < res.first){
				res = t;
				theK = k;
			}
		}
		if (res.first==INF) puts("NO SOLUTIONS");
		else printf("k=%d: %s\n",theK,res.second.c_str());
	}
}
